//#include "SoftwareSerial.h"

#define mySerial Serial3 // or something like this
char input[12];        // A variable to store the Tag ID being presented
int count = 0;        // A counter variable to navigate through the input[] character array


String ssid ="Rick and morty";

String password="newagetech";

//SoftwareSerial Serial2(6, 7);// RX, TX

String data;
String tag_num;

String server = "assetmant1.000webhostapp.com"; // www.example.com

String uri = "/log.php";// our example is /Serial2post.php

//int DHpin = 8;//sensor pin

//byte dat [5];

//String tag_num ,location;
String location;

void setup() {

//pinMode (DHpin, OUTPUT);

Serial2.begin(115200);
 mySerial.begin(9600);

Serial.begin(57600);

reset();

connectWifi();

}

//reset the Serial28266 module

void reset() {

Serial2.println("AT+RST");

delay(1000);

if(Serial2.find("OK") ) Serial.println("Module Reset");

}

//connect to your wifi network

void connectWifi() {

String cmd = "AT+CWJAP=\"" +ssid+"\",\"" + password + "\"";

Serial2.println(cmd);

delay(4000);

if(Serial2.find("OK")) {

Serial.println("Connected!");

}

else {

connectWifi();

Serial.println("Cannot connect to wifi"); }

}


String convertToString(char* input, int a_size) 
  { 
    int p; 
   String s = ""; 
   for (p = 0; p < a_size; p++) { 
        s = s + input[p]; 
   } 
    return s; 
  } 


void loop () {


location = "Library";

//tag_num = "02006F9A8F78";

  if (mySerial.available()) {

        //Serial.print((char)mySerial.read());
  count = 0; // Reset the counter to zero
    /* Keep reading Byte by Byte from the Buffer till the RFID Reader Buffer is empty 
       or till 12 Bytes (the ID size of our Tag) is read */
       Serial.println("now scaning the tag data");
    while(mySerial.available() && count < 12) 
    {
       //Serial.println("now starting the whille loop");
     input[count] = mySerial.read(); // Read 1 Byte of data and store it in the input[] variable
      count++; // increment counter
      delay(5);
    //  Serial.println("got a bit");
    }

 if(count == 12)
    {

     Serial.println("recieved the tag Data");


    int a_size = sizeof(input) / sizeof(char); 
  
    String tag_num = convertToString(input, a_size);

    //Serial.print("should hv printed");
  Serial.println(tag_num);

  data = "tag_num=" + tag_num + "&location=" + location;// data sent must be under this form //name1=value1&name2=value2.

  httppost();
     
 
 }
 
}



//data = "temperature=" + temp + "&humidity=" + hum;




}

void httppost () {

Serial2.println("AT+CIPSTART=\"TCP\",\"" + server + "\",80");//start a TCP connection.

if( Serial2.find("OK")) {

Serial.println("TCP connection ready");

} delay(1000);

String postRequest =

"POST " + uri + " HTTP/1.0\r\n" +

"Host: " + server + "\r\n" +

"Accept: *" + "/" + "*\r\n" +

"Content-Length: " + data.length() + "\r\n" +

"Content-Type: application/x-www-form-urlencoded\r\n" +

"\r\n" + data;

String sendCmd = "AT+CIPSEND=";//determine the number of caracters to be sent.

Serial2.print(sendCmd);

Serial2.println(postRequest.length() );

delay(500);

if(Serial2.find(">")) { Serial.println("Sending.."); Serial2.print(postRequest);

if( Serial2.find("SEND OK")) { Serial.println("Packet sent");

while (Serial2.available()) {

String tmpRSerial2 = Serial2.readString();

Serial.println(tmpRSerial2);

}

// close the connection

Serial2.println("AT+CIPCLOSE");

}

}}
