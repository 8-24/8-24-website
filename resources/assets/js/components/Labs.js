import React, { Component } from 'react';
import {
  Link
} from 'react-router-dom'
import {NavBarLogic} from '../logic/NavLogic';

export default class Labs extends Component{
  constructor(props){
    super(props);
    this.state = {
      selectedSection : 0,
      categories: [
        {content: "Simple! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis."},
        {content: "Innovant! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis."},
        {content: "Original! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tristique massa, a fermentum risus consectetur quis."}
      ]
    }
  }
  componentDidMount(){
    /*
    var wrap = document.getElementById("app-agile-container");
    wrap.className = "black-background";
    document.getElementById('nav-default-logo').style.display = 'none';    // hide default 8-24 logo
    document.getElementById('nav-lab-logo').style.display = 'block';      // show default 8-24 logo
    document.getElementById('side-nav-home-logo').style.display = 'block'; // show side home btn
    document.getElementById('side-nav-labs-logo').style.display = 'none'; // hide labs logo
    document.getElementById('red-burger').style.display = 'none'; // hide red burger
    document.getElementById('yellow-burger').style.display = 'block';

    document.getElementById('close-nav-btn-red').style.display = 'none'; // hide red btn
    document.getElementById('close-nav-btn-yellow').style.display = 'block'; // show yellow btn
    */
    NavBarLogic("black", "illustration");

    axios.get('http://127.0.0.1:8000/api/labs/categories')
      .then(response => {
        this.setState({categories: response.data})
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
          <Link to={`/labs/${item.slug}`} >
            <span id={item.id} className={(this.state.selectedSection ==  (item.id-1) ? "home-section-link home-section-link-active" : "home-section-link")} onClick={this.changeText.bind(this)}>{item.title}</span>
            <span id={"slash-"+item.id} className="red-color"> /</span>
          </Link>
        </div>
      }
    )
    return sectionsBtn;
  }


  render(){
    return(
      <div className="margin-top-hundred">
        <div className="row">
          {this.sectionList(this.state.categories)}
        </div>
        <p className="color-white">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias animi architecto aut cumque eaque eum, facere fugiat inventore ipsa molestias mollitia nam necessitatibus numquam quam quisquam rem tempora tempore tenetur.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus doloribus et facere nam officia perferendis! A, atque deleniti dolorem fuga in optio quae saepe sint vel. Accusamus id, iure?
        </p>
      </div>

    )
  }
}