import React, { Component } from 'react';
import Parser from 'html-react-parser';
import {
  Link
} from 'react-router-dom'
import P5Wrapper from 'react-p5-wrapper';
import {NavBarLogic} from '../logic/NavLogic';
import Sketch from '../logic/Sketch';
export default class LabsPost extends Component{
  constructor(props){
    super(props);
    this.state = {post: {}}
  }


  componentDidMount(){
    NavBarLogic("black", "color");
    var path = this.props.location.pathname;
    axios.get('http://127.0.0.1:8000/api/labs/posts/'+this.props.match.params.slug)
      .then(response => {
        this.setState({post: response.data});
      });
  }

  goTo(){
    //TODO: automatise ça
    this.props.history.push('/creative-coding');
  }

  
  render(){
    //<P5Wrapper sketch={Sketch} />-->
    return(
      <div className="margin-top-hundred color-white">
        <h1 className="color-white">{this.state.post.title}</h1>
        <div id="gallery-content">
          <br/>
          <h1>Hello LabsPost</h1>
          {Parser(String(this.state.post.content))}
        </div>
        <hr/>
        <Link to={`/labs/${this.props.match.params.category}`}>
          <img src="/img/arrow_back_white.svg"  className="arrow-back" />
        </Link>
      </div>

    )
  }
}




