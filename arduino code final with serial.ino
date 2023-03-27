#include <SPI.h>
#include <MFRC522.h>
#include <LiquidCrystal_I2C.h>
#include <Wire.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);
#define SS_PIN 10
#define RST_PIN 9
MFRC522 mfrc522(SS_PIN, RST_PIN);
void setup() {
        Serial.begin(9600);  // Initiate a serial communication
        SPI.begin();         // Initiate  SPI bus
        mfrc522.PCD_Init();  // Initiate MFRC522
        lcd.backlight();
        lcd.init();
        lcd.setCursor(0, 0);
        lcd.print("i'm waiting ...");
}
void loop() {
  // Look for new cards
  if (!mfrc522.PICC_IsNewCardPresent()) {
    return;
  }
  // Select one of the cards
  if (!mfrc522.PICC_ReadCardSerial()) {
    return;
  }
 //Show UID on serial monitor
  String content = "";
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
    content.concat(String(mfrc522.uid.uidByte[i], HEX));
    content.toUpperCase();
  }
  Serial.println(content.substring(1));
  lcd.setCursor(0, 1);
  lcd.print(content.substring(1));

  String response = "";

  if (content.substring(1) == "DC 80 61 49") {
    response = "Zakaria ouazzani";
  } else if (content.substring(1) == "B3 2E 95 04") {
    response = "said boukhryss  ";
  } else {
    response = "student not found";
  }
  lcd.setCursor(0, 0);
  lcd.print(response);
  delay(100);
}
