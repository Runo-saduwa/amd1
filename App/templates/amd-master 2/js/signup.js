
const signup = document.querySelector('.signUp')
const alert = document.querySelector('.alert');

signup.addEventListener('click', (event) => {

    const name = document.querySelector('.name').value;
    const email = document.querySelector('.email').value;
    const password = document.querySelector('.password').value;
    event.preventDefault();
   console.log(name, email, password)

    fetch('/signup', {
        method: 'POST',
        headers : new Headers(),
        body:JSON.stringify({name, email, password})
    }).then((res) => res.json())
    .then((data) => {
         data.forEach(res => {
             if(res.status === 1){
                 alert.classList.add('show','alert-success')
               setTimeout(() => {
                alert.classList.remove('show','alert-success');
               }, 1000)
             }
         })
        
        })
    .catch((err)=>console.log(err))
  })


