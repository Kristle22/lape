import './App.css';
import Hello from './Components/009/Hello';
import Kurmis from './Components/009/Kurmis';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <Hello name="Kristina"></Hello>
        <Kurmis spalva="crimson" dydis={20} skaicius={4} />
        <Hello name="Kurmi" />
        <Kurmis spalva="skyblue" dydis={10} skaicius={4} />
        <Hello name="Kurmi" />
      </header>
    </div>
  );
}

export default App;
