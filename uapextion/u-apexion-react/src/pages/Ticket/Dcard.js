import { useEffect } from 'react';
import config from './Config';

function Dcard() {
  useEffect(() => {
    (async function data() {
      const response = await fetch(config.Dcard_API);
      const dataList = await response.json();
      console.log(dataList);
    })();
  }, []);

  return (
    <>
      <p>123</p>
    </>
  );
}

export default Dcard;
