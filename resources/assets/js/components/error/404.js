import React, { Component } from 'react';
export default class Error404 extends Component{
  constructor(props){
    super(props);
    this.state = {
    };
  }
  componentDidMount(){
    NavBarLogic("grey", "illustration");
  }
  render()
  {
    return(
      <div>
        <div className="margin-top-hundred">
          <p>
            <h1>
              Oups! Error 404! 
            </h1>
          </p>
        </div>
      </div>
    )
  }



}
