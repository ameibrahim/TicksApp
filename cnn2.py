import os
from sklearn.metrics import confusion_matrix, accuracy_score, precision_score, recall_score
from tensorflow.keras.preprocessing.image import ImageDataGenerator
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Conv2D, MaxPooling2D, Flatten, Dense

# Define the path to the main directory containing subdirectories for each class
data_directory = 'data/'

# Specify the image dimensions and batch size
img_width, img_height = 128, 128
batch_size = 32
# Use ImageDataGenerator for data augmentation and normalization
datagen = ImageDataGenerator(
    rescale=1./255,
    shear_range=0.2,
    zoom_range=0.2,
    horizontal_flip=True,
    validation_split=0.2  # Adjust the validation split ratio as needed
)

# Create separate generators for training and validation sets
train_generator = datagen.flow_from_directory(
    data_directory,
    target_size=(img_width, img_height),
    batch_size=batch_size,
    class_mode='categorical',
    classes=['Unidentified', 'Hyalomma', 'Rhipicephalus'],
    subset='training'  # Specify 'training' for the training set
)

validation_generator = datagen.flow_from_directory(
    data_directory,
    target_size=(img_width, img_height),
    batch_size=batch_size,
    class_mode='categorical',
    classes=['Unidentified', 'Hyalomma', 'Rhipicephalus'],
    subset='validation'  # Specify 'validation' for the validation set
)

# Build a simple CNN model
model = Sequential()
model.add(Conv2D(32, (3, 3), input_shape=(img_width, img_height, 3), activation='relu'))
model.add(MaxPooling2D(pool_size=(2, 2)))
model.add(Flatten())
model.add(Dense(128, activation='relu'))
model.add(Dense(3, activation='softmax'))  # Assuming you have 3 classes

# Compile the model
model.compile(optimizer='adam', loss='categorical_crossentropy', metrics=['accuracy'])
# Train the model using the generators
history = model.fit(
    train_generator,
    steps_per_epoch=train_generator.samples // batch_size,
    epochs=20,  # Adjust the number of epochs as needed
    validation_data=validation_generator,
    validation_steps=validation_generator.samples // batch_size
)

# Evaluate the model on the test set (you should have a separate test set)
test_generator = datagen.flow_from_directory(
    data_directory,
    target_size=(img_width, img_height),
    batch_size=batch_size,
    class_mode='categorical',
    classes=['Unidentified', 'Hyalomma', 'Rhipicephalus'],
    subset='validation'
)

# Make predictions on the test set
test_loss, test_accuracy = model.evaluate(test_generator, steps=test_generator.samples // batch_size)
print("Test Loss:", test_loss)
print("Test Accuracy:", test_accuracy)

y_true = test_generator.classes
y_pred_probs = model.predict(test_generator, steps=test_generator.samples // batch_size)
y_pred = np.argmax(y_pred_probs, axis=1)

# Calculate confusion matrix
conf_matrix = confusion_matrix(y_true, y_pred)

# Calculate accuracy
accuracy = accuracy_score(y_true, y_pred)

# Calculate precision
precision = precision_score(y_true, y_pred, average='weighted')

# Calculate sensitivity (recall)
sensitivity = recall_score(y_true, y_pred, average='weighted')

# Print the results
print("Confusion Matrix:")
print(conf_matrix)
print("Accuracy:", accuracy)
print("Precision:", precision)
print("Sensitivity (Recall):", sensitivity)

# Save the model
model.save('tickBugsModelV3.h5')
