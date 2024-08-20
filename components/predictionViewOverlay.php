<div class="overlay prediction-view-overlay">
    <div class="popup prediction-view-popup">

        <div class="popup-body prediction-view-body">

            <div class="image-view-wrapper">

                <div class="loader-view prediction-review-loader">
                    <div>
                        <div class="sk-grid">
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                        </div>
                    </div>
                </div>
        
                <img class="image-review-view" style="display:none;" alt="">
            </div>

            <div class="image-view-details-wrapper">
                <div class="close-button" onclick="
                closePopup('.prediction-view-overlay');
                ">
                    <img src="../assets/icons/close.png" alt="">
                </div>

                <div class="stretch-container">
                    <div class="simple-grid">
                        <p class="subheading">Predicted Class</p>
                        <p class="stand-out" id="predicted-class-placeholder">Rhipicephalus</p>
                    </div>
                </div>

                <div class="stretch-container">
                    <div class="simple-grid">
                        <p class="subheading">Predicted Date</p>
                        <p class="stand-out" id="predicted-date-placeholder">24/05/2024</p>
                    </div>
                </div>

                <div class="stretch-container">
                    <div class="simple-grid">
                        <p class="subheading">Model Used</p>
                        <p class="stand-out" id="predicted-model-used">VGG16_VARA00z_128x128_EP30_ACCU99.56_24-06-2024.keras</p>
                    </div>
                </div>

                <div class="stretch-container">
                    <div class="simple-grid">
                        <p class="subheading">Model Accuracy</p>
                        <p class="stand-out" id="predicted-model-accuracy">..%</p>
                    </div>
                </div>

                
            </div>
            
        </div>

        <!-- <div class="loader-view predict-loader">
            <div>
                <div class="sk-grid">
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    </div>
            </div>
        </div> -->
    </div>
</div>