#include <Ethernet.h>
#include <SPI.h>
#include <DallasTemperature.h>
#include <OneWire.h>
#include <Wire.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_BMP085_U.h>
#include "DHT.h"
#define DHTPIN 2 
#define ONE_WIRE_BUS 7
#define DHTTYPE DHT11   // DHT 11

Adafruit_BMP085_Unified bmp = Adafruit_BMP085_Unified(10085);

int fotoPin = A0;   //fotorezystor

OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);
DHT dht(DHTPIN, DHTTYPE);

byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xAB}; 

char server[] = "page url";
EthernetClient client;

float temperatura;
int cisnienie;
 
void setup() { 
 Serial.begin(9600);
 sensors.begin();
 dht.begin();
 Serial.println("connecting...");
 }
void loop(void){


sensors.requestTemperatures();
temperatura = sensors.getTempCByIndex(0);
Serial.print("Temperatura:"); 
Serial.print(sensors.getTempCByIndex(0)); // first founded sensor have Index 0
Serial.println(" C");

float h = dht.readHumidity() + 30.0;
Serial.print("Wilgotnosc: ");
Serial.print(h);
Serial.println(" %");

sensors_event_t event;
bmp.getEvent(&event);
cisnienie = event.pressure; 
if (event.pressure)
{
Serial.print("Cisnienie:    ");
Serial.print(event.pressure);
Serial.println(" hPa");
}
else
{
Serial.println("Sensor error");
}

int sensorValue = analogRead(0);      //pomiar natezenia swiatla w %
float natezenie = sensorValue * (100.0 / 1023.0);  //wyrazone w %
Serial.print("Natezenie: ");
Serial.print(natezenie);
Serial.println(" %");
//Połączenie z serwerem
 if (client.connect(server , 80)) { 
    Serial.println("connected"); 
    client.print("GET /pages/dodaj.php?"); 
    client.print("newtemp=");
    client.print(newtemp);
    client.print("&&");
    client.print("h=");
    client.print(h);
    client.print("&&");
    client.print("cisnienie=");
    client.print(cisnienie);
    client.print("&&");
    client.print("natezenie=");
    client.print(natezenie);
    client.println( " HTTP/1.1");
    client.println( "Host: stmetkkinz.cba.pl" );
    client.println( "Content-Type: application/x-www-form-urlencoded" );
    client.println( "Connection: close" );
    client.println();
    client.println();
    Serial.println("zaraz rozlaczy");
 }
 if(client.connected()){
  client.stop();
  Serial.println("Disconnected");
 }
delay(900000); // 15 min
}



