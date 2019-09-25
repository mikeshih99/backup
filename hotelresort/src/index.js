import React from "react";
import ReactDOM from "react-dom";
//import './index.css';

import { BrowserRouter } from "react-router-dom";
import App from "./App";
import { RoomProvider } from "./context";

ReactDOM.render(
    <RoomProvider>
        <BrowserRouter>
            <App />
        </BrowserRouter>
    </RoomProvider>,
    document.getElementById("root")
);

