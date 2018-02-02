import React, { Component } from 'react';
import ProgressiveImage from 'react-progressive-bg-image';
import { hashHistory } from 'react-router';
import {
  BrowserRouter as Router,
  Route,
  Link,
} from 'react-router-dom'
import {NavBarLogic} from '../logic/NavLogic';
export default class Works extends Component {
  constructor(props) {
    super(props);
    this.props =  {
      display: ''
    };
    this.state = {works: []};
  }
  componentDidMount() {
    NavBarLogic("grey", "color", "black");
    window.scrollTo(0, 0);
    if(this.props.display == "preview"){
      axios.get('https://www.8-24.ch/api/works/limit/4')
        .then(response => {
          this.setState({works: response.data})
        });
    }else{

      axios.get('https://www.8-24.ch/api/works/limit/400')
        .then(response => {
          this.setState({works: response.data})
        });

    }
  }

  ButtonDisplayMore(){
    if(this.props.display == "preview"){
      return <div className="row work-link">
        <Link to="/works"><h2>Voir tout + </h2></Link>
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

  WorksList(list){
    console.log(list);
    // list works to item
    var works = list.map((item) => {
      return <div className="block-preview three columns margin-top-fifty" key={item.id}>
                <div className="work-link" >
                    <Link to={`/works/${item.slug}`} >
                      <h3 id={item.slug}>{item.title}</h3>
                    </Link>
                    <Link to={`/works/${item.slug}`} >
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

    return works;
  }

  render()
  {
    return(
      <div className="margin-top-hundred">
        <div className="">
          <div className="">
            <h1>Works</h1>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid doloribus eius fugit hic itaque mollitia nihil soluta velit veniam? Assumenda enim et harum magnam magni, officia perferendis velit voluptate!
              <br/>
            </p>
            <div className="row">
              {this.WorksList(this.state.works)}
            </div>
              {this.ButtonDisplayMore()}
              {this.ButtonGoBack()}
          </div>
        </div>
      </div>
    )
  }


}
