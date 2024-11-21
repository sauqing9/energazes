<head>
    <style>
      @font-face {
          font-family: 'SFProDisplayRegular';
          src: url('../assets/fonts/SFProDisplayRegular.ttf') format('truetype');
      }
      /* SF Pro Semibold */
      @font-face {
          font-family: 'SFProSemibold';
          src: url('../assets/fonts/SFProSemibold.ttf') format('truetype');
      }

      /* Gotham Ultra */
      @font-face {
          font-family: 'GothamUltra';
          src: url('../assets/fonts/GothamUltra.ttf') format('truetype');
      }

      /* Gotham Bold */
      @font-face {
          font-family: 'GothamBold';
          src: url('../assets/fonts/GothamBold.ttf') format('truetype');
      }

      /* Gotham Book */
      @font-face {
          font-family: 'GothamBook';
          src: url('../assets/fonts/GothamBook.ttf') format('truetype');
      }
      /* Custom styles specific to this modal */
      .modal-content {
        background-color: #f0f8ff;
        border-radius: 10px;
      }
      .modal-title {
        color: #000000;
        font-family: 'GothamBold', sans-serif;
      }
      .modal-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 1rem;
        padding-bottom: 0px;
        padding-left: 0px;
        padding-right: 0px;
      }
      .modal-body, .modal-footer {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .exc-mark-img {
        width: 100%;  
      }
      .modal-header, .modal-footer {
        border: none; 
      }
      .modal-body {
        font-family: 'GothamBook', sans-serif;
        padding-left: 15%;
        padding-right: 15%;
        padding-top: 0px;
        padding-bottom: 0px;
        color: black;
        font-size: 90%;
      }
      .btn-outline-dark {
        font-family: 'GothamBook', sans-serif;
        font-size: 12px;
        margin-bottom: 10px;
        padding: 0.35rem 1.25rem; 
      }
    </style>
  </head>
  <body>
    <div class="modal fade" id="failedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <img src="assets/images/exclamation_grove.png" alt="Exclamation mark" class="exc-mark-img">
              <h5 class="modal-title" id="exampleModalLabel">Registration Error</h5>
            </div>
            <div class="modal-body">
              This is the body of the modal.<br>
              This is the body of the modal.<br>
              This is the body of the modal.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-dark rounded-pill" data-dismiss="modal">Go back</button>
            </div>
          </div>
        </div>
      </div>
  </body>
  

  