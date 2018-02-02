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
    NavBarLogic("grey", "color", "black");
    window.scrollTo(0, 0);
    if(this.props.display == "preview") {
      axios.get('https://www.8-24.ch/api/blog/limit/4')
        .then(response => {
          this.setState({posts: response.data})
        });
    }else{
      axios.get('https://www.8-24.ch/api/blog/limit/400')
        .then(response => {
          this.setState({posts: response.data})
        });
    }
  }

  ButtonDisplayMore(){
    if(this.props.display == "preview"){
      return <div className="row work-link">
        <Link to="/blog"><h2>Voir tout +</h2></Link>
      </div>

    }
  }

  ButtonGoBack(){
    if(this.props.display != "preview"){
      return <h1 onClick={this.goTo.bind(this)}>
      <img className="arrow-back" src="/img/arrow_back_black.svg" />
    </h1>
    }
  }
  goTo(){
    this.props.history.push('/');
  }

  PostsList(list){
    console.log(list);
    // list works to item
    var posts = list.map((item) => {
        return <div className="three columns margin-top-fifty" key={item.id}>
          <div className="work-link" >
            <Link to={`/blog/${item.slug}`} ><h3 id={item.slug} >{item.title}</h3></Link>
            <Link to={`/blog/${item.slug}`} >
              <ProgressiveImage
                id={item.slug}
                src={item.cover}
                placeholder={item.cover}
                style={{
                  height: 200,
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
        <p>ici se trouve un coin de partage, ou nous publions régulièrement des articles sur différents domaines. Conseil technique, nouveautés web et tendances culturelles/graphiques, nous mettons à disposition,ici, une source de bonne informataion rempli de conseil pertinant,d'astuce en tout genre, dans des articles rapides à lire qui vous permetterons, nous l'éspèrons, de rester à jour sur les différentes façons de s'adapter au tendance et à la concurence.     </p>
        <div className="row">
          {this.PostsList(this.state.posts)}
        </div>
        {this.ButtonDisplayMore()}
        {this.ButtonGoBack()}
      </div>
    )
  }
}
