import React, { Component } from 'react';
import Parser from 'html-react-parser';
import P5Wrapper from 'react-p5-wrapper';
import {NavBarLogic} from '../logic/NavLogic';
export default class LabsPost extends Component{
  constructor(props){
    super(props);
    this.state = {post: {}}
  }


  componentDidMount(){
    //var wrap = document.getElementById("app-agile-container");
    //wrap.className = "black-background";
    //document.body.className += ' ' + 'body-black-bg';
    /*
    document.getElementById('app-agile-container').className = "body-black-bg";
    document.getElementById('nav-default-logo').style.display = 'none';    // hide default 8-24 logo
    document.getElementById('nav-lab-logo').style.display = 'block';      // hide default 8-24 logo
    document.getElementById('side-nav-home-logo').style.display = 'block'; // hide side home btn
    document.getElementById('red-burger').style.display = 'none'; // hide red burger
    document.getElementById('yellow-burger').style.display = 'block';

    document.getElementById('close-nav-btn-red').style.display = 'block';
    document.getElementById('close-nav-btn-yellow').style.display = 'none';
*/
    NavBarLogic("black", "color");
    var path = this.props.location.pathname;
    axios.get('http://127.0.0.1:8000/api'+path)
      .then(response => {
        console.log(response.data);
        this.setState({post: response.data});
        eval(response.data.script_content);
      });
  }








  goTo(){
    // TODO automatise ça
    this.props.history.push('/creative-coding');
  }


  render(){
    return(
      <div className="margin-top-hundred color-white">
        <h1 className="color-white">{this.state.post.title}</h1>
        <div id="gallery-content">
          {Parser(String(this.state.post.content))}
        </div>
        <hr/>
        <h1 onClick={this.goTo.bind(this)}>Retour <span className="red-color">/</span></h1>
      </div>

    )
  }
}




