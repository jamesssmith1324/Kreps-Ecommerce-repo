function toggleForm(){
    const container = document.querySelector('.container')
    const section =  document.querySelector('.sec')
    container.classList.toggle('active')
    section.classList.toggle('color')
}

function check(){
    if (document.getElementById('password').value == document.getElementById('confirmPassword').value) {
    //   document.getElementById('confirmPassword').style.boxShadow = '0px 0px 5px green';
      document.getElementById('confirmPassword').style.backgroundColor = 'rgba(0,255,0,0.1)';
      document.getElementById('sub').disabled = false;
    } else {
    //   document.getElementById('confirmPassword').style.boxShadow = '0px 0px 5px red';
      document.getElementById('confirmPassword').style.backgroundColor = 'rgba(255,0,0,0.1)';
      document.getElementById('sub').disabled = true;


    }
  }