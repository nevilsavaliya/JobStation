import sys
import face_recognition
import numpy as np
import cv2
import base64
import io
import mysql.connector
from PIL import Image, ImageDraw


# Define the database connection parameters
host = "localhost"
dbuser = "root"
password = ""
database = "job_station"

# Create a connection
conn = mysql.connector.connect(
    host=host,
    user=dbuser,
    password=password,
    database=database
)

# Create a cursor object to execute SQL queries
cursor = conn.cursor()

uid = sys.argv[1]

user = sys.argv[2]

# Define and execute the SQL query to retrieve the image
query = "SELECT `image` FROM `" + user + "` WHERE `id` =" + uid + ";"
cursor.execute(query)

# Fetch the result
result = cursor.fetchone()

# Check if there was a result
if result is not None:
    img_data = result[0]

    # Create a file-like object from the bytes data
    img_file = io.BytesIO(img_data)

    # Load the image file using face_recognition
    user_image = face_recognition.load_image_file(img_file)
    user_face_encoding = face_recognition.face_encodings(user_image)[0]
    known_face_encodings = [
        user_face_encoding
    ]
    known_face_names = [
        "UserFace"
    ]
else:
    print("No result found.")

query = "SELECT `img` FROM `faces` WHERE `uid` = " + uid + " AND `user` = '" + user + "';"
cursor.execute(query)

# Fetch all the rows from the query result as a list of tuples
results = cursor.fetchall()

person = []

# Use a for loop to iterate over the list of tuples and decode the binary data
for result in results:
    img_data = result[0]
    img_data = base64.b64decode(img_data)

    img_file = io.BytesIO(img_data)
    unknown_image = face_recognition.load_image_file(img_file)

    face_locations = face_recognition.face_locations(unknown_image)
    face_encodings = face_recognition.face_encodings(unknown_image, face_locations)

    pil_image = Image.fromarray(unknown_image)
    draw = ImageDraw.Draw(pil_image)

    for (top, right, bottom, left), face_encoding in zip(face_locations, face_encodings):

        matches = face_recognition.compare_faces(known_face_encodings, face_encoding)

        name = "Unknown"

        face_distances = face_recognition.face_distance(known_face_encodings, face_encoding)
        best_match_index = np.argmin(face_distances)
        if matches[best_match_index]:
            name = known_face_names[best_match_index]

        person += name

count = person.count("UserFace")
length = len(person)
if (count / length * 100) >= 30:
   print(1)
else:
    print(0)
    #     draw.rectangle(((left, top), (right, bottom)), outline=(0, 0, 255))
    #
    #     # Use cv2 for text drawing
    #     font = cv2.FONT_HERSHEY_SIMPLEX
    #     font_scale = 0.5
    #     font_thickness = 1
    #     font_color = (255, 255, 255)
    #
    #     text_size = cv2.getTextSize(name, font, font_scale, font_thickness)[0]
    #     text_position = (left + 6, bottom - text_size[1] - 5)
    #
    #     cv2.putText(np.array(pil_image), name, text_position, font, font_scale, font_color, font_thickness)
    #
    # pil_image.show()