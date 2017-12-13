import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {
  BrowserRouter as Router,
  Route,
  Link,
} from 'react-router-dom'
import Home from './Home';
import Works from './Works';
import WorkPost from './WorkPost';
import Contact from './Contact';
import Blog from './Blog';
import BlogPost from './BlogPost';
import Labs from './Labs';
import CreativeCoding from './CreativeCoding';
import LabsPost from './LabsPost';

export default class Example extends Component {
    constructor(props){
      super(props);
      this.state = {defaultPage: 0}
    }


    navInteract()
    {
        var nav = document.getElementById('display-nav');
        if(nav.className == 'displayed-nav' || nav.className == 'displayed-black-nav'){
            //alert('close nav');
            nav.className = 'hidden-nav';
            document.getElementById('display-nav-bg').className = 'hidden-nav-bg';
        }else{
            //alert('open nav');
            if( 1 == 2) // check if lab
            {
              nav.className = "displayed-black-nav";
            }else { // else all other pages
              nav.className = 'displayed-nav';
              document.getElementById('display-nav-bg').className = 'showed-nav-bg';
            }
        }

    };

    render() {
        return (
          <Router>
              <div id="app-agile-container" className="white-background">
                <Link to="/" id="side-nav-home-logo">
                  <img className="u-full-width nav-logo" src="/img/logo_white.svg" alt="8-24 agence logo"/>
                </Link>
                <Link to="/labs" id="side-nav-labs-logo">
                  <img className="u-full-width nav-logo" src="/img/lab_logo.svg" alt="8-24 agence lab logo"/>
                </Link>
                <div className="container">
                  <div className="twelve columns">
                      <nav className="navbar">
                        <div className="row">
                          <div className="nav-logo-wrapper">
                              <Link to="/" id="nav-default-logo">
                                  <img className="u-full-width nav-logo" src="/img/logo.svg" alt="8-24 agence logo"/>
                              </Link>
                              <Link to="/labs" id="nav-lab-logo">
                                <img className="u-full-width " src="/img/lab_logo.png" alt="8-24 laboratory logo"/>
                               </Link>
                              <div id="nav-burger" className="nav-burger" onClick={this.navInteract}>
                                  <img id="red-burger" className="u-full-width" src="/img/menu_burger.svg" alt=""/>
                                  <img id="yellow-burger" className="u-full-width" src="/img/menu_burger_yellow.svg" alt=""/>
                              </div>
                          </div>
                        </div>
                        <div id="display-nav" className="hidden-nav">
                          <li  onClick={this.navInteract} >X</li>
                          <ul>
                              <li><Link onClick={this.navInteract} to="/">Home</Link></li>
                              <li><Link onClick={this.navInteract} to="/works">Works</Link></li>
                              <li><Link onClick={this.navInteract} to="/blog">Blog</Link></li>
                              <li><Link onClick={this.navInteract} to="/labs">Labs</Link></li>
                              <li><Link onClick={this.navInteract} to="/contact">Contact</Link></li>
                          </ul>
                        </div>
                      </nav>
                      <div className="page-content">
                        <Route exact path="/" component={Home}/>

                        <Route exact path="/works" component={Works}/>
                        <Route path="/works/:slug" component={WorkPost} />

                        <Route exact path="/blog" component={Blog} />
                        <Route path="/blog/:slug" component={BlogPost} />

                        <Route exact path="/labs" component={Labs} />
                        <Route exact path="/labs/creative-coding" component={CreativeCoding} />
                        <Route path="/labs/:category/:slug" component={LabsPost} />

                        <Route exact path="/contact" component={Contact}/>

                      </div>
                  </div>
                </div>
              </div>
          </Router>
              );
    }
}
if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}