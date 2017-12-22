import React, { Component } from 'react';


export default class Home extends Component{

  componentDidMount(){

    var wrap = document.getElementById("app-agile-container");
    wrap.className = "white-background";
    document.getElementById('nav-default-logo').style.display = 'block';     // hide default 8-24 logo
    document.getElementById('nav-lab-logo').style.display = 'none';       // hide default 8-24 logo
    document.getElementById('side-nav-home-logo').style.display = 'none'; // hide side home btn
    document.getElementById('red-burger').style.display = 'block';
    document.getElementById('yellow-burger').style.display = 'none';

  }

  validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  handleForm(e){
    e.preventDefault();
    var email = document.getElementById('message-mail').value;
    //alert(email);
    var content = document.getElementById('message-content').value;
    if(content != "" && content != null && email != "" && email != null){

      if(this.validateEmail(email))
      {
        var apiKey = document.getElementsByName('csrf-token').value;
        var data = {
          'email': email,
          'content': content
        };

        // mail valid
        axios.post('http://127.0.0.1:8000/api/add-contact-message', data)

          .then((response) => {
            document.getElementById('contact-success-message').className = '';
            document.getElementById('message-mail').className = 'invisible-bg u-full-width';
          })
          .catch((error) => {
            alert("Une erreur s'est produite du côté de nos serveurs, veuillez rafraîchir la page et réessayer.");
          });


      }else{
        // mail not valid
        //alert('mail pas valide');
        document.getElementById('message-mail').className += ' input-warning';
      }


    }
    //alert('handle form');
  }

  render(){
    return(
      <div>
      <div className="margin-top-hundred">
        <h1>Contact</h1>
        <div className="row">
          <div className="six columns">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias animi architecto aut cumque eaque eum, facere fugiat inventore ipsa molestias mollitia nam necessitatibus numquam quam quisquam rem tempora tempore tenetur.</p>
          </div>
          <div className="six columns">
            <div id="contact-success-message" className="hidden">
              <h2>Envoi réussi</h2>
              <p>Nous avons bien reçu votre message, notre équipe vous répondra à l'adresse e-mail laissée au plus vite ;)</p>
            </div>
            <form action="" id="contact-form">
              <input id="message-mail" type="text" className="invisible-bg u-full-width" placeholder="votre adresse mail" />
              <textarea id="message-content" className="invisible-bg u-full-width" placeholder="Ecrivez nous ici"  cols="30" rows="10"></textarea>
              <button onClick={this.handleForm.bind(this)}>Envoyer</button>
            </form>
          </div>

        </div>
      </div>
     </div>

    )
  }
}