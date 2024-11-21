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
      .check-mark-img {
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
        text-align: center;
        font-size: 90%;
      }
      .btn-outline-primary {
        font-family: 'GothamBook', sans-serif;
        font-size: 12px;
        margin-bottom: 10px;
        padding: 0.35rem 1.25rem; 
      }
    </style>
  </head>
  <body>
  <!-- Modal untuk Submit Failed -->
  <div class="modal fade" id="questionFailedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <img src="assets/images/exclamation_grove.png" alt="error" class="check-mark-img">
                  <h5 class="modal-title" id="exampleModalLabel">
                      <!-- Periksa pesan error -->
                      @if(session('error') == 'Admin accounts cannot submit questions.')
                          Admin Cannot Submit
                      @else
                          Submit Failed
                      @endif
                  </h5>
              </div>
              <div class="modal-body">
                  <!-- Tampilkan pesan sesuai kondisi error -->
                  @if(session('error') == 'Admin accounts cannot submit questions.')
                      Admin accounts cannot submit questions.
                  @else
                      It seems that you have not logged in yet. Please log in to submit a question.
                  @endif
              </div>
              <div class="modal-footer">
                  @if(session('error') == 'Admin accounts cannot submit questions.')
                      <button type="button" class="btn btn-outline-danger rounded-pill" data-dismiss="modal">Close</button>
                  @else
                      <a href="{{ route('login') }}">
                          <button type="button" class="btn btn-outline-primary rounded-pill">Log In</button>
                      </a>
                  @endif
              </div>
          </div>
      </div>
  </div>


  </body>
  

  