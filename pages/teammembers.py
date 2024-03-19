import streamlit as st

st.page_link("app.py", label=f"← - - - Back To Homepage")
st.title("Team Members")
st.container(height=50, border=False)

col1, col2 = st.columns(2)

names = ["Prof. Dr. Tamer Şanlıdağ", "Prof. Dr. Fadi Al-Turjman", 
         "Assoc. Prof. Dr. Cenk Serhan Özverel", "Asst. Prof. Dr. Ayşe Seyer",
         "Dr. Erdal Sanlidag", "Mr. Ibrahim Ame", 
         "Ms. Hadjer Benyamina", "Matin Taghianzade"]

images = [ "pages/images/tamer.jpg", "pages/images/fadi.jpg", 
         "pages/images/serhan.jpg", "pages/images/seyer.jpg",
         "pages/images/default.png", "pages/images/ibrahim.png", 
         "pages/images/hadjer.jpeg", "pages/images/default.png" ]

counter = 0;

with st.container():
    for i in range(0, int(len(images)/2)):

        columnContainer = col1.container(border = True)
        columnContainer.image(images[counter], width=None)
        columnContainer.header(names[counter])

        counter += 1
        columnContainer = col2.container(border = True)
        columnContainer.image(images[counter], width=None)
        columnContainer.header(names[counter])
        counter += 1
    
