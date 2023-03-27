import serial
import requests

# Configure serial connection
ser =serial.Serial('COM6', 9600)

# Read RFID tag code from serial port
while True:
    data = ser.readline().decode('utf-8').rstrip()
    if data:
        print('RFID tag code:', data)

        #Define the URL of the Node.js server
        url = f'http://192.168.224.144/project/insert.php?CNE={data}'
        response = requests.get(url)
        #Print the response from the server
        print(response.text)