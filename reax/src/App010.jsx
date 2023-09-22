import { useState } from 'react';
import './App.css';
import './Functions/randColor';
import randColor from './Functions/randColor';


function App() {

  const [spalva, setSpalva] = useState('skyblue');
  const [skaicius, setSkaicius] = useState(1);

  const [kv, setKv] = useState([]);

  const add = () => setKv(k => [...k, randColor()]);
  const remove = () => setKv(k => k.slice(1));

  const cats = ['Pilkis', 'Rainis', 'Murkis'];

  const miracle = (a = 'be') => {
    console.log('Miracle of miracles! ' + a);
    return anotherMiracle();
  }

  const anotherMiracle = () => {
    console.log('Another Miracle of other miracles!');
    // const newColor = spalva === 'skyblue' ? 'crimson' : 'skyblue';
    setSpalva(oldColor => oldColor === 'skyblue' ? 'crimson' : 'skyblue');
    console.log(spalva);
  }

  const counting = () => {
    setSkaicius(c => c + 1);
  }

  return (
    <div className="App">
      <header className="App-header">
        <div className="kvc">
          {
            kv.map((k, i) => <div style={{ background: k }} className="kv" key={i}>{i}</div>)
          }
        </div>
        <div className="kvc">
          <button type="button" onClick={add}>ADD kv</button>
          <button type="button" onClick={remove}>REM kv</button>
        </div>
        <div style={{ marginTop: '20px' }}>
          {
            cats.map((c, i) => <div key={i}>{c}</div>)
          }
        </div>
        <h1>{skaicius}</h1>
        <button type="button" onClick={counting}>Let's count!</button>
        <h1 style={{ color: spalva }}>State</h1>
        <button type="button" onClick={() => miracle('Abra-Cadabra')}>Click me WITH!</button>
        <button type="button" onClick={anotherMiracle}>Click me W/O!</button>
      </header>
    </div>
  );
}

export default App;
