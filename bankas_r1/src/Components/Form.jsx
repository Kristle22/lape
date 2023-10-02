import { useState } from "react";

function Form({ errMsg, showForm, setFormData }) {

  const [text, setText] = useState('');

  if (!showForm) {
    return null;
  }


  const handleForm = () => {
    setFormData({ text });
  }

  return (
    <>
      <h1>Here's my FORM</h1>
      <fieldset>
        <legend>Enter</legend>
        <input type="text" value={text} onChange={e => setText(e.target.value)} />
        <button onClick={handleForm}>GO!</button>
        <div style={{
          border: errMsg ? '2px solid crimson' : '',
          background: errMsg ? '#bbb' : '',
          fontSize: '10px',
          fontWeight: '600',
          width: 'fit-content',
          padding: '3px 5px',
          margin: '3px 0'
        }}>{errMsg}</div>
      </fieldset>
    </>
  );
}

export default Form;