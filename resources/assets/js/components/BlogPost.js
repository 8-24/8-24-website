import React, { Component } from 'react';
import Parser from 'html-react-parser';
import {NavBarLogic} from '../logic/NavLogic';
export default class BlogPost extends Component{
  constructor(props){
    super(props);
    this.state = {post: {}}
  }

  componentDidMount(){
    NavBarLogic("grey", "color");
    window.scrollTo(0, 0);
    var path = this.props.location.pathname;

    axios.get('http://127.0.0.1:8000/api'+path)
      .then(response => {
        this.setState({post: response.data})
      });
  }

  goTo(){
    this.props.history.push('/blog');
  }


  render(){
    return(
      <div className="margin-top-hundred">
        <h1>{this.state.post.title}</h1>
        <div id="gallery-content">
          {Parser(String(this.state.post.content))}
        </div>
        <hr/>
        <h1 onClick={this.goTo.bind(this)}>
          <img className="arrow-back" src="/img/arrow_back_black.svg" />
        </h1>
      </div>

    )
  }
}