import './App.css';
import Create from './Components/Create';
import List from './Components/List';
import './bootstrap.css';

function App() {
  return (
    <div className="container">
      <div className="row">
        <Create />
        <List />
      </div>
    </div>
  );
}

export default App;
