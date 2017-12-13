import React, { Component } from 'react';
import Parser from 'html-react-parser';

export default class BlogPost extends Component{
  constructor(props){
    super(props);
    this.state = {post: {}}
  }


  componentDidMount(){
    var wrap = document.getElementById("app-agile-container");
    wrap.className = "white-background";
    document.getElementById('nav-default-logo').style.display = 'block';
    document.getElementById('nav-lab-logo').style.display = 'none';
    document.getElementById('side-nav-home-logo').style.display = 'none'; // hide side home btn
    document.getElementById('red-burger').style.display = 'block';
    document.getElementById('yellow-burger').style.display = 'none';

    var path = this.props.location.pathname;

    axios.get('http://127.0.0.1:8000/api'+path)
      .then(response => {
        console.log(response.data);
        this.setState({post: response.data})
      });

    //document.getElementById('gallery-content').innerHTML = this.state.gallery.content;

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
        <h1 onClick={this.goTo.bind(this)}>Retour <span className="red-color">/</span></h1>
      </div>

    )
  }
}