import React,{ Component } from 'react';
import axios from 'axios';

class RmOnForce extends Component{

    constructor(props){
        super(props);

        this.state = {
            id : this.props.match.params.id,
            force : {}
        }
        console.log(this.props.match.params.id);
    }

    componentDidMount(){

        axios.get('https://data.police.uk/api/forces/'+this.state.id)
        .then((response)=>{            
            this.setState({
                force : response.data
            });
        })
        .catch((e)=>{
            console.log(e);
        })
    }
    render(){

        return(
            <div>
                
            </div>

        );
    }
}
export default RmOnForce;