import React, { Component } from 'react';
import ProgressiveImage from 'react-progressive-bg-image';
import {
  BrowserRouter as Router,
  Route,
  Link,
} from 'react-router-dom'
import {NavBarLogic} from '../logic/NavLogic';
export default class Blog extends Component{
  constructor(props){
    super(props);
    this.state = {posts: []}


  }
  componentDidMount() {
    NavBarLogic("grey");
    if(this.props.display == "preview") {
      axios.get('http://127.0.0.1:8000/api/blog/limit/4')
        .then(response => {
          //console.log(response.data);
          this.setState({posts: response.data})
        });
    }else{
      axios.get('http://127.0.0.1:8000/api/blog/limit/400')
        .then(response => {
          //console.log(response.data);
          this.setState({posts: response.data})
        });
    }
  }



  ButtonDisplayMore(){
    if(this.props.display == "preview"){
      return <div className="row">
        <Link to="/blog"><h2>Autres Posts</h2></Link>
      </div>

    }
  }




  PostsList(list){
    console.log(list);
    // list works to item
    var posts = list.map((item) => {
        return <div className="three columns margin-top-fifty" key={item.id}>
          <div className="work-link" >
            <Link to={`/blog/${item.slug}`} ><h2 id={item.slug} >{item.title}</h2></Link>
            <Link to={`/blog/${item.slug}`} >
              <ProgressiveImage
                id={item.slug}
                //onClick={this.openPost.bind(this)}
                src={item.cover}
                placeholder={item.cover}
                style={{
                  height: 300,
                  backgroundSize: 'contain',
                  backgroundPosition: '',
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
      <div className="margin-top-hundred">
        <h1>Blog</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias animi architecto aut cumque eaque eum, facere fugiat inventore ipsa molestias mollitia nam necessitatibus numquam quam quisquam rem tempora tempore tenetur.</p>
        <div className="row">
          {this.PostsList(this.state.posts)}
        </div>
        {this.ButtonDisplayMore()}

      </div>

    )
  }
}