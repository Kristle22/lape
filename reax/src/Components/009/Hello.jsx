function Hello({ name }) {

  const pad = 7;

  return (
    <>
      <h1 style={{
        backgroundColor: pad > 5 ? 'pink' : 'yellow',
        padding: pad * 2 + 'px'
      }}>Hello, {name}!</h1>
    </>
  );
}

export default Hello;