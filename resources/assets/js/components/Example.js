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
        console.log("show bg nav");
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
                <Link to="/" id="side-nav-home-logo">
                  <img className="u-full-width nav-logo" src="/img/logo_white.svg" alt="8-24 agence logo"/>
                </Link>
                <Link to="/labs" id="side-nav-labs-logo">
                  <img className="u-full-width nav-logo" src="/img/lab_logo.svg" alt="8-24 agence lab logo"/>
                </Link>
                <div className="container">
                  <div className="twelve columns">
                      <div id="main-nav-wrap" className=""></div>
                      <nav className="navbar" id="">
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
                          <li className="twelve columns"  onClick={this.navInteract} >
                            <img className="close-nav-btn" id="close-nav-btn-red" src="/img/close_menu-red.svg" />
                            <img className="close-nav-btn" id="close-nav-btn-yellow" src="/img/close_menu-yellow.svg" />
                          </li>
                          <ul>
                              <li><Link onClick={this.navInteract} to="/">Home</Link></li>
                              <li><Link onClick={this.navInteract} to="/works">Works</Link></li>
                              <li><Link onClick={this.navInteract} to="/blog">Blog</Link></li>
                              <li><Link onClick={this.navInteract} to="/labs">Labs</Link></li>
                              <li><Link onClick={this.navInteract} to="/contact">Contact</Link></li>
                          </ul>
                        </div>
                      </nav>
                      <div className="page-content" id="page-content">
                        <Route exact path="/" component={Home}/>
                        <Route exact path="/works" component={Works}/>
                        <Route path="/works/:slug" component={WorkPost} />
                        <Route exact path="/blog" component={Blog} />
                        <Route path="/blog/:slug" component={BlogPost} />
                        <Route exact path="/labs" component={Labs} />
                        <Route exact path="/labs/creative-coding" component={CreativeCoding} />
                        <Route path="/labs/:category/:slug" component={LabsPost} />
                        <Route exact path="/contact" component={Contact}/>
                        <Route path="/error/404" component={Error404} /> 
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