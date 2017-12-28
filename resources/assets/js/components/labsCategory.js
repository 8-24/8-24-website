import React, { Component } from 'react';
import {
  Link
} from 'react-router-dom'
import {NavBarLogic} from '../logic/NavLogic';
import ProgressiveImage from 'react-progressive-bg-image';

export default class LabsCategory extends Component{
  constructor(props){
    super(props);
    this.state = {
        category: {},
        posts: []
    }
  }
  componentDidMount(){
    NavBarLogic("black", "color");
    window.scrollTo(0, 0);
    var slugCat = this.props.match.params.category;
    axios.get('http://127.0.0.1:8000/api/labs/categories/'+slugCat)
      .then(response => {
        this.setState({category: response.data})
      }).catch(error => {
        this.props.history.push('/labs');
      });
    axios.get('http://127.0.0.1:8000/api/labs/'+slugCat+'/posts')
      .then(response => {
        this.setState({posts: response.data})
      }).catch(error => {
        this.props.history.push('/labs');
      });
  }

  PostsList(list){
    var posts = list.map((item) => {
        return <div className="three columns margin-top-fifty" key={item.id}>
          <div className="lab-project-wrap work-link" >
            <Link className="lab-project-link" to={`/labs/${this.props.match.params.category}/${item.slug}`} ><h3 id={item.slug} >{item.title}</h3></Link>
            <Link to={`/labs/${this.props.match.params.category}/${item.slug}`} >
              <ProgressiveImage
                id={item.slug}
                className="lab-project-cover"
                src={item.cover}
                placeholder={item.cover}
                style={{
                  height: 200,
                  backgroundSize: 'contain',
                  backgroundPosition: 'center top',
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
        <h1 className="color-white">
          {this.state.category.title}
        </h1>
        <p className="color-white">
            {this.state.category.description}
        </p>
        <div className="row">
            {this.PostsList(this.state.posts)}
        </div>
        <hr/>
        <Link to="/labs">
          <img src="/img/arrow_back_white.svg"  className="arrow-back" />
        </Link>
      </div>

    )
  }
}