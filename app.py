import streamlit as st
from PIL import Image
from tensorflow.keras.models import load_model
import cv2
import numpy as np

from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing import image
import numpy as np

# Function to preprocess an input image
def preprocess_image(image_path):
    img = image.load_img(image_path, target_size=(128, 128))
    img_array = image.img_to_array(img)
    img_array = np.expand_dims(img_array, axis=0)
    img_array /= 255.0  # Normalize the image
    return img_array

# Function to make predictions on a given image
def predict_image(model, image_path):
    preprocessed_image = preprocess_image(image_path)
    prediction = model.predict(preprocessed_image)
    class_index = np.argmax(prediction)
    class_labels = ['unidentified', 'Hyalomma', 'Rhipicephalus']
    predicted_class = class_labels[class_index]
    return predicted_class

def predictWithImage(image):

    # Load the model
    loaded_model = load_model('tickBugsModelV2.h5')

    # Path to the image you want to predict
    image_path_to_predict = image

    # Make a prediction
    return predict_image(loaded_model, image_path_to_predict)


st.image("air-logo.png", width = 300)
st.title("Tick Insect Predictor")

uploaded_file = st.file_uploader("Upload Image", type=["jpg", "png"], accept_multiple_files=False, on_change=None)

if uploaded_file is not None:
    st.write("filename: ", uploaded_file.name)
    st.image(uploaded_file, caption=uploaded_file.name, width=None, use_column_width=None)
    result = predictWithImage(uploaded_file)
    st.header(':black[Predicted Bug Class]')
    st.header(f':blue[{result}]')