import "./styles/index.scss";
import "bootstrap/dist/css/bootstrap.min.css";

import { BrowserRouter as Router } from "react-router-dom";
import Routes from "./components/routes";
import Navbar from "./components/navbar";
import Footer from "./components/footer";

function App() {
    return (
        <div className="App">
            <Router>
                <div className="body">
                    <header>
                        <Navbar />
                    </header>
                    <Routes />
                    <Footer />
                </div>
            </Router>
        </div>
    );
}

export default App;
