document.getElementById('questionForm').addEventListener('submit', function(e) {
    e.preventDefault();  // Mencegah form untuk submit secara default

    let formData = new FormData(this);

    fetch("/submit-question", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'not_logged_in') {
            $('#question-popup-failed').modal('show');
        } else if (data.status === 'success') {
            $('#question-popup-success').modal('show');
        }
    })
    .catch(error => console.error('Error:', error));
});
