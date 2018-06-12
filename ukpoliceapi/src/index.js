import React from 'react';
import {render} from 'react-dom';
import './index.css';

import registerServiceWorker from './registerServiceWorker';

import 'bootstrap/dist/css/bootstrap.min.css';

import App from './App';

render(
    <App/>,
    document.getElementById('root'));
    registerServiceWorker();
