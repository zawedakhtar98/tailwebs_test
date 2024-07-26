function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var togglePassword = document.getElementById('togglePassword');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePassword.classList.remove('fa-eye');
        togglePassword.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        togglePassword.classList.remove('fa-eye-slash');
        togglePassword.classList.add('fa-eye');
    }
}

    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('student-from').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        let student_name = document.getElementById('student_name').value;
        let subject = document.getElementById('subject').value;
        let marks = document.getElementById('marks').value;
        let valid = true;
        
        if(!student_name){
            document.getElementById('student_nameError').innerHTML="Student cant be blank!";
            valid = false;
        }
        if(!subject){
            document.getElementById('subjectError').innerHTML="Subject cant be blank!";
            valid = false;
        }
        if(!marks){
            document.getElementById('marksError').innerHTML="Marks cant be blank!";
            valid = false;
        }
        if(!valid){
            return;
        }
        let formData = {
            name: student_name,
            subject: subject,
            marks: marks
        };
        
        let csrfToken = document.querySelector('input[name="_token"]').value;
        
        fetch('/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(formData)
        })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => { throw new Error(text) });
            }
            return response.json();
        })
        .then(data => {
            if(data.status){
                document.getElementById('errorMsg').innerHTML="<div class='alert alert-success'>"+data.msg+"</div>";
                setTimeout(function() {
                    window.location.href= "http://127.0.0.1:8000/student-list";
                },3000)
            }
            else{
                
                document.getElementById('errorMsg').innerHTML="<div class='alert alert-danger'>"+data.msg+"</div>";
                
            }
        })
        .catch(error => {
            alert('An error occurred:');
            // alert('An error occurred: ' + error.message);
        });
    });
});