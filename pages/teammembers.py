import streamlit as st

st.page_link("app.py", label=f"← - - - Back To Homepage")
st.title("Team Members")
st.container(height=50, border=False)

col1, col2 = st.columns(2)

with st.container():

    columnContainer = col1.container(border = True)
    columnContainer.image("pages/images/tamer.jpg", width=None)
    columnContainer.header("Prof. Dr. Tamer Şanlıdağ")

    columnContainer = col2.container(border = True)
    columnContainer.image("pages/images/fadi.jpg", width=None)
    columnContainer.header("Prof. Dr. Fadi Al-Turjman")

    columnContainer = col1.container(border = True)
    columnContainer.image("pages/images/serhan.jpg", width=None)
    columnContainer.header("Assoc. Prof. Dr. Cenk Serhan Özverel")

    columnContainer = col2.container(border = True)
    columnContainer.image("pages/images/eda.jpg", width=None)
    columnContainer.header("Assoc. Prof. Dr. Eda Becer")

    columnContainer = col1.container(border = True)
    columnContainer.image("pages/images/default.png", width=None)
    columnContainer.header("Assoc. Prof. Dr. Burcu Yüksel")

    columnContainer = col2.container(border = True)
    columnContainer.image("pages/images/default.png", width=None)
    columnContainer.header("Res. Assit. Nadire Kıyak")

    columnContainer = col1.container(border = True)
    columnContainer.image("pages/images/ibrahim.png", width=None)
    columnContainer.header("Mr. Ibrahim Ame")

    columnContainer = col2.container(border = True)
    columnContainer.image("pages/images/default.png", width=None)
    columnContainer.header("Ms. Hadjer Benyamina")

    
