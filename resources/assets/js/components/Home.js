import React, { Component } from 'react';
import Works from './Works';
import Blog from './blog';
import Contact from './Contact';
import Parser from 'html-react-parser';

export default class Home extends Component{
  constructor(props){
    super(props);
    this.state = {
      selectedSection : 0,
      sections: [
        {content: "Simple! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis."},
        {content: "Innovant! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis."},
        {content: "Original! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis."}
      ]
    };


    //this.changeText = this.changeText.bind(this);
  }
  componentDidMount(){
    var wrap = document.getElementById("app-agile-container");
    wrap.className = "white-background";
    document.getElementById('nav-default-logo').style.display = 'block';     // hide default 8-24 logo
    document.getElementById('nav-lab-logo').style.display = 'none';       // hide default 8-24 logo
    document.getElementById('side-nav-home-logo').style.display = 'none'; // hide side home btn
    document.getElementById('red-burger').style.display = 'block';
    document.getElementById('yellow-burger').style.display = 'none';

    axios.get('http://127.0.0.1:8000/api/home')
      .then(response => {
        //console.log(response.data);
        this.setState({sections: response.data})
      });

  }

  changeText(id){
    var idCatched = id.target.id;
    console.log(idCatched);
    this.setState(
      {selectedSection: (Number(idCatched) - 1)} // cast to int
      );
    var sectionsTitles = document.getElementsByClassName('home-section-link-active');
    if(sectionsTitles != undefined) {
      //sectionsTitles.classList.remove('home-section-link-active');
    }
    document.getElementById(idCatched).className = "home-section-link home-section-link-active";
  }

  sectionList(sections){
    var sectionsBtn =  sections.map((item) => {
      return <div className="home-section-title-wrap">
        <span id={item.id} className={(this.state.selectedSection ==  (item.id-1) ? "home-section-link home-section-link-active" : "home-section-link")} onClick={this.changeText.bind(this)}>{item.title}</span>
        <span id={"slash-"+item.id} className="yellow-color"> /</span>
        </div>
        }
      )
    return sectionsBtn;
  }

  render()
  {
    return(
      <div>
        <div className="margin-top-hundred">
          <div className="row">
            {this.sectionList(this.state.sections)}
          </div>
          <p>
            <h2>
              Nous ne sommes pas "low-coast", juste hônnetes.
            </h2>
          </p>
          <p>
            <h4>
              {Parser(String(this.state.sections[this.state.selectedSection].content))}
            </h4>
          </p>
        </div>
        <div className="row">
          <Works display={"preview"} />
        </div>
        <div className="row">
          <Blog display={"preview"} />
        </div>
        <div className="row">
          <Contact />
        </div>
      </div>

    )
  }



}