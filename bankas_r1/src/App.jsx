import { useState, useEffect } from 'react';
import axios from 'axios';
import './App.css';
import Home from './Components/Home';
import Form from './Components/Form';

function App() {

  const [numbers, setNumbers] = useState([]);
  const [lastUpdate, setLastUpdate] = useState(Date.now());

  const [showForm, setShowForm] = useState(true);

  const [formData, setFormData] = useState(null);
  const [formText, setFormText] = useState('');
  const [errMsg, setErrMsg] = useState('');

  useEffect(() => {
    axios.get('http://bankas.bit/api/home')
      .then(res => {
        setNumbers(res.data);
        // console.log(res);
      });
  }, [lastUpdate]);

  useEffect(() => {
    if (null === formData) return;
    axios.post('http://bankas.bit/api/form', formData)
      .then(res => {
        setLastUpdate(Date.now());

        if (res.data.err) {
          setErrMsg(res.data.msg);
          setFormText('');
        } else {
          setErrMsg('');
          setFormText(res.data.text);
        }
      });
  }, [formData]);

  return (
    <>
      <Home numbers={numbers} />
      <h1 style={{ color: 'crimson' }}>{formText}</h1>
      <button onClick={() => setShowForm(f => !f)}>Show Form</button>
      <Form errMsg={errMsg} showForm={showForm} setFormData={setFormData} />
    </>
  );
}

export default App;
