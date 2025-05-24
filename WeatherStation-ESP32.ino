/* 
 * @author:   AlexVezo
 * @date:     Feb 2019
 * @version:  V1.0
 * @info:     Measure and send data via GET request via microcontroller ESP32 
 * @uses:     Adafruit_Sensor, Adafruit_BME280, WiFi, Wire
 * @licence:  GNU GPL v2
 */


// --- Only for Debug ---
// const int sleepTime = 10000;     // Time = 10 seconds
// const int sleepTime = 621e6;     // Time ~= 10 min

// --- Constants ---
const int sleepTime   = 5*60*1000-100;  // 5 min
const int anemoPin    = 26;             // Pin connected to Anemometer
const int pluvioPin   = 25;             // Pin connected to Pluviometer
const int skopioPin   = 34;             // Pin connected to Anemoskop
unsigned int waitTime = 100;            // Time [in ms] between last and current function call
const int httpPort    = 80;
const char* host      = "192.168.178.37";

// --- Libraries --- 
#include <WiFi.h>
#include <Wire.h>                   // Needed for the Adafruit Libraries
#include <Adafruit_Sensor.h>        // For any Adafruit library using sensors 
#include <Adafruit_BME280.h>        // With some editing inside the library
                                    // + installed library in IDE: "I2C-Sensor-Lib iLib"
// --- Variables ---
Adafruit_BME280 bme;                 
volatile int anemoCount  = 0;       // Counts the interrupts (half rotations) of the anemometer
volatile int pluvioCount = 0;       // Counts the interrupts (flips) of the pluviometer

unsigned long anemoLastCall  = 0;   // 
unsigned long skopioLastCall = 0;   // 
unsigned long pluvioLastCall = 0;   // 

// --------------------------------------
// --- Predefined functions
// --------------------------------------

void setup() {
  init();                           // Exectuting the main code
}

void loop() {
  sendData();                       // Transmitting data over WLAN to RPi
  sleep();                          // Enter Sleep Mode  
}

// --------------------------------------
// --- Functions
// --------------------------------------

void init() {

  // Establish a wireless connection to the router
  WiFi.begin("[SSID]", "[password]")                  // EDIT: credentials removed

  // If not connected: Wait until it is connected
  while (WiFi.status() != WL_CONNECTED) { 
     delay(500); 
  }

  // Start communication with BMP280
  bme.begin();  

  // Define the mode the BMP280 uses for measurements
  bme.setSampling( Adafruit_BME280::MODE_FORCED,      // Take forced measurements
                   Adafruit_BME280::SAMPLING_X1,      // 1x temperature oversampling
                   Adafruit_BME280::SAMPLING_X1,      // 1x pressure oversampling
                   Adafruit_BME280::SAMPLING_X1,      // 1x humidity oversampling
                   Adafruit_BME280::FILTER_OFF );     // Filter off

  // Anemoskop: Define it as input
  pinMode(skopioPin, INPUT);

  // Anemometer: Attach Interrupts
  digitalWrite(anemoPin, HIGH);      // Noise supression
  pinMode(anemoPin, INPUT_PULLUP);
  attachInterrupt(digitalPinToInterrupt(anemoPin), anemoCalc, FALLING);

  // Pluviometer: Attach Interrupts
  digitalWrite(pluvioPin, HIGH);     // Noise supression
  pinMode(pluvioPin, INPUT_PULLUP);
  attachInterrupt(digitalPinToInterrupt(pluvioPin), pluvioCalc, FALLING);
}
 
void sendData() {
 
  // Check WiFi connection status: Is the ESP32 connected?
  if (WiFi.status()== WL_CONNECTED){   

    // BMP280: Take measurements
    bme.takeForcedMeasurement();
    double temperature = bme.readTemperature();
    double pressure    = bme.readPressure();
    double humidity    = bme.readHumidity();
 
    // Anemometer:  Get half rotations, reset variable
    int anemo          = anemoCount;
    anemoCount         = 0;

    // Pluviometer: Get half rotations, reset variable
    int pluvio         = pluvioCount;
    pluvioCount        = 0;

    // Anemoskop:   Get current position
    int skopio         = analogRead(skopioPin);
    delay(100);

    // Concatenate the measurements into a GET request
    String url = "";
    url += "/index.php?temperature=";
    url += temperature;
    url += "&humidity=";
    url += humidity;
    url += "&pressure=";
    url += pressure; 
    url += "&anemo=";
    url += anemo; 
    url += "&pluvio=";
    url += pluvio; 
    url += "&skopio=";
    url += skopio; 

    // Use WiFiClient class to create TCP connections
    WiFiClient client;
   
    if (!client.connect(host, httpPort)) {
        return; // Connection failed
    }

    // This will send the request to the server
    client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n\r\n");

    unsigned long timeout = millis();
    while (client.available() == 0) {
        if (millis() - timeout > 5000) {
            client.stop(); // Client TImeout
            return;
        }
     }
  }
 
}

// Enter Deep Sleep. Reset all values
void sleep() {

  // Enter deep Sleep. Reset after {sleepTime}
  // ESP.deepSleep(sleepTime);  
  delay(sleepTime);
  
}

// --------------------------------------
// --- Interrupt functions
// --------------------------------------

// anemoCalc(): Count half rotations of the anemometer
void anemoCalc() {

   // Get current time of call to function
   unsigned long currentTime = millis();

   // Debounding: Check to see if anemoClac() was called within the last 100 milliseconds
   if (currentTime - anemoLastCall > 100) {
        anemoLastCall = currentTime;
        anemoCount++;
   }

}


// anemoCalc(): Count how many times the tipping bucket inside the pluviometer flips
void pluvioCalc() {

   // Get current time of call to function
   unsigned long currentTime = millis();

   // Debounding: Check to see if anemoClac() was called within the last 100 milliseconds
   if (currentTime - pluvioLastCall > 100) {
        pluvioLastCall = currentTime;
        pluvioCount++;
   }

}
