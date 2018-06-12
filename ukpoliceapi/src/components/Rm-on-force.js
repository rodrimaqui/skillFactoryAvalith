import React,{ Component } from 'react';
import axios from 'axios';

import {Card,CardTitle,CardBody,CardSubtitle,CardText,CardLink,CardImg} from 'reactstrap';

class RmOnForce extends Component{

    constructor(props){
        super(props);

        this.state = {
            id : this.props.match.params.id,
            force : {}
        }
    }

    componentDidMount(){

        axios.get('https://data.police.uk/api/forces/'+this.state.id)
        .then((response)=>{            
            this.setState({
                force : response.data
            });
            console.log(this.state.force);
        })
        .catch((e)=>{
            console.log(e);
        })
    }
    render(){

        return(
            <div>
               <Card body inverse style={{ backgroundColor: '#333', borderColor: '#333' }}>
                    <CardBody>
                        <CardTitle>{this.state.force.name}</CardTitle>
                        <CardSubtitle>Telephone: {this.state.force.telephone}</CardSubtitle>
                    </CardBody>                
                    <CardBody>
                    <CardImg bottom width="100%" src="https://placeholdit.imgix.net/~text?txtsize=33&txt=318%C3%97180&w=318&h=180" alt="Card image cap" />
                        <CardText>{this.state.force.description}</CardText>
                        <CardLink href={this.state.force.url}>Police Page</CardLink>
                    </CardBody>
                </Card>
            </div>

        );
    }
}
export default RmOnForce;