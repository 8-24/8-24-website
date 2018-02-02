import React, { Component } from 'react';
import {NavBarLogic} from '../logic/NavLogic';

export default class Home extends Component{

  componentDidMount(){
    NavBarLogic("grey", "color", "black");
    window.scrollTo(0, 0);
  }

  validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  handleForm(e){
    e.preventDefault();
    var email = document.getElementById('message-mail').value;
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
        axios.post('https://www.8-24.ch/api/add-contact-message', data)
          .then((response) => {
            document.getElementById('contact-success-message').className = '';
            document.getElementById('message-mail').className = 'invisible-bg u-full-width';
            document.getElementById('contact-form').style.display = 'none';
          })
          .catch((error) => {
            alert("Une erreur s'est produite du côté de nos serveurs, veuillez rafraîchir la page et réessayer.");
          });
      }else{
        // mail not valid
        document.getElementById('message-mail').className += ' input-warning';
      }
    }
  }

  render(){
    return(
      <div>
      <div className="margin-top-hundred">
        <h1>Contact</h1>
        <div className="row">
          <div className="six columns">
            <p>
            Si vous avez besoin de plus d'informations, si vous désirez nous soumettre un projet, un brief, un concours. Ou si vous voulez obtenir un portfolio de notre agence ou simplement nous écrire, nous sommes toujours à votre disposition.
            </p>
          </div>
          <div className="six columns">
            <div id="contact-success-message" className="hidden">
                <img src="/img/checkmark.png" className="u-full-width checkmark" />
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
