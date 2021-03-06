import React, { Component } from 'react';
import Parser from 'html-react-parser';
import {NavBarLogic} from '../logic/NavLogic';

export default class WorkPost extends Component{
  constructor(props){
    super(props);
    this.state = {gallery: ""}
  }

  componentDidMount(){
    NavBarLogic("grey", "color", "black");
    window.scrollTo(0, 0);
    var path = this.props.location.pathname;
    axios.get('https://www.8-24.ch/api'+path)
      .then(response => {
        this.setState({gallery: response.data})
      }).catch(error => {
        this.props.history.push('/works');
      });
  }

  goTo(){
    this.props.history.push('/works');
  }
  
  render(){
    return(
      <div className="margin-top-hundred">
        <h1>{this.state.gallery.title}</h1>
          <div id="gallery-content">
            {Parser(String(this.state.gallery.content))}
          </div>
        <hr/>
        <div onClick={this.goTo.bind(this)}>
        <img className="arrow-back" src="/img/arrow_back_black.svg" />
        </div>
      </div>
    )
  }
}
