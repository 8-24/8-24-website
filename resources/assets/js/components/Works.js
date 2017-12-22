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
    NavBarLogic("grey");

    if(this.props.display == "preview"){
      axios.get('http://127.0.0.1:8000/api/works/limit/4')
        .then(response => {
          //console.log(response.data);
          this.setState({works: response.data})
        });
    }else{

      axios.get('http://127.0.0.1:8000/api/works/limit/400')
        .then(response => {
          //console.log(response.data);
          this.setState({works: response.data})
        });

    }
  }

  ButtonDisplayMore(){
    if(this.props.display == "preview"){
      return <div className="row">
        <Link to="/works"><h2>Autres Projets</h2></Link>
      </div>

    }

  }

  WorksList(list){
    console.log(list);
    // list works to item
    var works = list.map((item) => {
      return <div className="block-preview three columns margin-top-fifty" key={item.id}>
                <div className="work-link" >
                    <Link to={`/works/${item.slug}`} >
                      <h2 id={item.slug}>{item.title}</h2>
                    </Link>
                    <Link to={`/works/${item.slug}`} >
                      <ProgressiveImage
                        id={item.slug}
                        //onClick={this.openGalery.bind(this)}
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
          </div>
        </div>
      </div>
    )
  }


}