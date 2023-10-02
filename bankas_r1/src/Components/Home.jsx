function Home({ numbers }) {

  return (
    <>
      <h1>HOME! Sweet HOME!</h1>

      <div className="home">
        Home
        <div className="home__bin">
          Bin
          <div className="home__bin__content">
            Content
          </div>
        </div>
      </div>

      <ul>
        {/* <?php foreach($list as $val) : ?>
        <li><?= $val ?></li>
        <?php endforeach ?> */}
        {
          numbers.map((n, i) => <li key={i}>{n}</li>)
        }
      </ul>
    </>
  );
}

export default Home;