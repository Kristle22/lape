import './App.css';
import LoginBtn from './Components/LoginBtn';
import Home from './Components/Home';

function App() {

  return (
    <div className="App">
      <header className="App-header">
        <Home />
        <LoginBtn />
      </header>
    </div>
  );
}

export default App;
