import 'babel-polyfill';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {
  BrowserRouter as Router,
  Route,
  Link,
} from 'react-router-dom'
//import TransitionGroup from "react-transition-group/TransitionGroup";
import { AnimatedSwitch } from 'react-router-transition';
import Home from './Home';
import Works from './Works';
import WorkPost from './WorkPost';
import Contact from './Contact';
import Blog from './Blog';
import BlogPost from './BlogPost';
import Labs from './Labs';
import LabsCategory from './labsCategory';
import LabsPost from './LabsPost';
import Error404 from './error/404';

export default class Example extends Component {
    constructor(props){
      super(props);
      this.state = {
        defaultPage: 0, 
        transform: ''}
    }
    componentDidMount(){
      //window.addEventListener('scroll', this.handleScroll);
      window.addEventListener('scroll', this.handleScroll);
    }

    handleScroll(ev)
    {
      var posY = this.scrollY;
      var state = false;
      if(posY > 100)
      {
        state = true;
      }
      if(posY < 100)
      {
        state = false;
      }
      if(state)
      {
        document.getElementById('main-nav-wrap').classList.add('display-logo-bg');
      }else{
        document.getElementById('main-nav-wrap').classList.remove('display-logo-bg');
      }
    }

    navInteract()
    {
        var nav = document.getElementById('display-nav');
        if(nav.classList.contains('displayed-nav'))
        {
            nav.classList.remove('displayed-nav');
            nav.classList.add('hidden-nav');
          }else{
            nav.classList.remove('hidden-nav');
            nav.classList.add('displayed-nav');
        }
    };

    render() {
        return (
          <Router>
              <div id="app-agile-container" className="white-background">
              <div id="side-nav-wrap">
                <Link to="/" id="side-nav-home-logo">
                  <img className="u-full-width nav-logo" src="/img/aye_logo.svg" alt="aye communication logo"/>
                </Link>
                <Link to="/labs" id="side-nav-labs-logo">
                  <img className="u-full-width nav-logo" src="/img/lab_logo-02-02-02.svg" alt="aye communication logo"/>
                </Link>
              </div>
                <div className="container">
                  <div className="twelve columns">
                      <div id="main-nav-wrap" className=""></div>
                      <nav className="navbar" id="">
                          <div className="nav-logo-wrapper">
                              <Link to="/" id="nav-default-logo">
                                  <img id="nav-default-logo-img" className="u-full-width nav-logo" src="/img/logo.svg" alt="aye communication logo web"/>
                              </Link>
                              <Link to="/labs" id="nav-lab-logo">
                                <img className="u-full-width " src="/img/lab_logo-02-02-02.svg" alt="aye communication logo web"/>
                               </Link>
                               <div id="side-nav-responsive">
                                <Link to="/" id="side-nav-responsive-home-logo">
                                  <img className="u-full-width nav-logo" src="/img/aye_logo.svg" alt="aye communication logo"/>
                                </Link>
                                <Link to="/labs" id="side-nav-responsive-labs-logo">
                                  <img className="u-full-width nav-logo" src="/img/lab_logo-02-02-02.svg" alt="aye communication lab logo web"/>
                                </Link>
                              </div>
                              <div id="nav-burger" className="nav-burger" onClick={this.navInteract}>
                                  <img id="red-burger" className="u-full-width" src="/img/menu_burger.svg" alt="aye communication web "/>
                                  <img id="yellow-burger" className="u-full-width" src="/img/menu_burger_yellow.svg" alt="aye commmunication web"/>
                              </div>
                          </div>
                        <div id="display-nav" className="hidden-nav">
                          <li className="twelve columns"  onClick={this.navInteract} >
                            <img className="close-nav-btn" id="close-nav-btn-red" src="/img/close_menu-red.svg" />
                            <img className="close-nav-btn" id="close-nav-btn-yellow" src="/img/close_menu-yellow.svg" />
                          </li>
                          <ul>
                              <li><Link onClick={this.navInteract} to="/">Home</Link></li>
                              <li><Link onClick={this.navInteract} to="/works">Works</Link></li>
                              <li><Link onClick={this.navInteract} to="/blog">Blog</Link></li>
                              <li><Link onClick={this.navInteract} to="/labs">Labo</Link></li>
                              <li><Link onClick={this.navInteract} to="/contact">Contact</Link></li>
                          </ul>
                        </div>
                      </nav>
                      <div className="page-content" id="page-content">
                      <AnimatedSwitch
                        atEnter={{ opacity: 0 }}
                        atLeave={{ opacity: 0 }}
                        atActive={{ opacity: 1 }}
                        className="switch-wrapper"
                      >
                        <Route exact path="/" component={Home}/>
                        <Route exact path="/works" component={Works}/>
                        <Route path="/works/:slug" component={WorkPost} />
                        <Route exact path="/blog" component={Blog} />
                        <Route path="/blog/:slug" component={BlogPost} />
                        <Route exact path="/labs" component={Labs} />
                        <Route exact path="/labs/:category" component={LabsCategory} />
                        <Route exact path="/labs/:category/:slug" component={LabsPost} />
                        <Route exact path="/contact" component={Contact}/>
                        <Route exact path="/error/404" component={Error404} /> 
                      </AnimatedSwitch>

                      </div>
                  </div>
                </div>
                  <footer> 8/24 Agence Copyright © 2018 | all rights reserved | suivez-nous sur -
                      <a href="https://www.facebook.com/hello824/"> facebook  </a> <a href="https://www.instagram.com/8_24agence/?hl=fr"> - instagram </a>  </footer>
              </div>

          </Router>

              );
            }
          }



if (document.getElementById('example')) {
//    <Route exact path="/labs/creative-coding" component={CreativeCoding} />
    ReactDOM.render(<Example />, document.getElementById('example'));
}

