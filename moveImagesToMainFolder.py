import os
import shutil

def move_images_and_delete_subfolders(main_folder):
    # Get a list of all subfolders
    subfolders = [f.path for f in os.scandir(main_folder) if f.is_dir()]
    
    # Iterate over each subfolder
    for subfolder in subfolders:
        # Get a list of all files in the subfolder
        files = [f.path for f in os.scandir(subfolder) if f.is_file() and f.name.lower().endswith(('.jpg', '.jpeg', '.png', '.gif'))]
        
        # Move each image file to the main folder
        for file in files:
            shutil.move(file, os.path.join(main_folder, os.path.basename(file)))
        
        # Delete the subfolder
        shutil.rmtree(subfolder)


main_directories = ["data/Unidentified", "data/Rhipicephalus", "data/Hyalomma"]

for main_directory in main_directories:
    # Call the function to move images to the main directory folder
    move_images_and_delete_subfolders(main_directory)

print("Images moved successfully to the main directory folder.")
