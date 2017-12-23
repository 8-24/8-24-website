import React, { Component } from 'react';
import ProgressiveImage from 'react-progressive-bg-image';
import {
  BrowserRouter as Router,
  Route,
  Link,
} from 'react-router-dom'
import P5Wrapper from 'react-p5-wrapper';
import {NavBarLogic} from '../logic/NavLogic';


export default class CreativeCoding extends Component{
  constructor(props){
    super(props);
    this.state = { posts: [] }

  }
  componentDidMount() {
    NavBarLogic("black", "color");
    var script;
    axios.get('http://127.0.0.1:8000/api/creative-coding')
      .then(response => {
        console.log(response.data);
        this.setState({posts: response.data})
        //eval(response.data);
        //response.data;
      });
  }

  PostsList(list){
    var posts = list.map((item) => {
        return <div className="three columns margin-top-fifty" key={item.id}>
          <div className="work-link" >
            <Link to={`/labs/creative-coding/${item.slug}`} ><h2 id={item.slug} >{item.title}</h2></Link>
            <Link to={`/labs/creative-coding/${item.slug}`} >
              <ProgressiveImage
                id={item.slug}
                src={item.cover}
                placeholder={item.cover}
                style={{
                  height: 300,
                  backgroundSize: 'contain',
                  backgroundPosition: 'center center',
                }}
              />
            </Link>
          </div>
        </div>
      }
    );

    return posts;
  }


  render(){
    return(
      <div className="margin-top-hundred ">
        <div className="color-white">
          <h1>Creative Coding</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias animi architecto aut cumque eaque eum, facere fugiat inventore ipsa molestias mollitia nam necessitatibus numquam quam quisquam rem tempora tempore tenetur.</p>
          <div>
            {this.PostsList(this.state.posts)}
          </div>
        </div>



      </div>

    )
  }
}