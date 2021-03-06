import React, { useState, useEffect } from 'react';
import styled from 'styled-components';
import { Link, useLocation } from 'react-router-dom';
import PropTypes from 'prop-types';
import ForumNav from '../../../components/Forum-Nav';

const Root = styled.div`
  ${'' /* border: 1px solid red; */}
  width: 100%;
  margin: 0 auto;
  ${'' /* border: 1px solid red; */}/
`;
const AllDisplayFlex = styled.div`
  display: flex;
`;
const PostTitle = styled(Link)`
  font-size: 15px;
  font-weight: bold;
  color: black;
  text-decoration: none;
`;

const PostDate = styled.div`
  color: black;
  font-size: 12px;
`;
const ForumSortNew = styled(Link)`
  display: flex;
  align-items: center;
  background-color: black;
  padding-right: 10px;
  border-radius: 30px;
  border: 4px double #05f2f2;
  ${props =>
    props.$active &&
    `
    text-decoration: none;
    background-color: #05f2f2;
    color: black;
    border: 4px double black;
  `};
`;

function Post({ post }) {
  const [likes, setLikes] = useState(post.article_likes);
  const [save, setSave] = useState(post.article_save);
  return (
    <>
      <div className="card forum_card">
        <div className="card-body forum_card_body">
          <div className="card-user">
            <div className="forum_user-top">
              <div className="forum_user_top_left">
                <div className="forum_user-logo">
                  <img
                    className="cover"
                    src={`./index_img/${post.imgs}`}
                    alt=""
                  />
                </div>
                <div className="user-title">
                  <div className="user-name forum_user-name">{post.name}</div>
                  <PostDate>
                    {new Date(post.art_create_time).toLocaleString()}
                  </PostDate>
                </div>
              </div>
            </div>
            <div className="article-title">
              <PostTitle to={`/forum-home/posts/${post.forum_sid}`}>
                {post.art_title}
              </PostTitle>
            </div>
            <div className="article-text">
              <p className="article-ellipsis">{post.art_content}</p>
            </div>
          </div>
          <div className="article-hashtag">
            <a href="#/" className="card-link forum_card-link">
              {post.hashtag1}
            </a>
            <a href="#/" className="card-link forum_card-link">
              {post.hashtag2}
            </a>
          </div>
        </div>
        <div className="article-like-box">
          <div
            className="article-like-box-group"
            onClick={() => setLikes(likes + 1)}
          >
            <i className="fas fa-heart"></i>
            <div className="article-like-box-number">{likes}</div>
          </div>
          <div className="article-like-box-group">
            <i className="fas fa-comment"></i>
            <div className="article-like-box-number">
              {post.article_comments}
            </div>
          </div>
          <div
            className="article-like-box-group"
            onClick={() => setSave(save + 1)}
          >
            <i className="fas fa-bookmark"></i>
            <div className="article-like-box-number">{save}</div>
          </div>
        </div>
      </div>
    </>
  );
}

Post.propTypes = {
  post: PropTypes.object,
};

export default function ForumUArticlePage() {
  const location = useLocation();
  const [posts, setPosts] = useState([]);
  const [searchTerm, setSearchTerm] = useState('');

  useEffect(() => {
    fetch('http://localhost:3001/forum_index/getAll')
      .then(res => res.json())
      .then(posts => setPosts(posts));
  }, []);

  return (
    <Root>
      <AllDisplayFlex>
        <ForumNav />
        <div class="artical">
          <div class="forum-sort-and-post">
            <div class="forum-sort">
              <div class="forum-sort-group">
                <div class="forum-sort-icon">
                  <a href="#/" class="forum_justify">
                    <i class="fas fa-sort"> </i>
                    <div className="forum_sort_text">SORT</div>
                  </a>
                </div>
                <div class="sort-new">
                  <ForumSortNew
                    to="/forum-apexion-articles"
                    $active={location.pathname === '/forum-member-posts'}
                    // class="forum_justify"
                  >
                    <i class="fas fa-clock"></i>
                    <div className="forum_sort_new">NEW</div>
                  </ForumSortNew>
                </div>
                <div class="sort-hot">
                  <a href="#/" class="forum_justify">
                    <i class="fas fa-burn"></i>
                    <div className="forum_sort_text"> HOT</div>
                  </a>
                </div>
              </div>
            </div>
            <div class="forum-post">
              <div class="forum-post-group">
                <div class="forum-post">
                  <Link to="/publish">
                    <a href="#/" class="forum_justify">
                      <i class="fas fa-pen"></i>
                      <div className="forum_sort_text"> POST</div>
                    </a>
                  </Link>
                </div>
              </div>
            </div>
          </div>
          <div className="searchOutline">
            <input
              type="text"
              placeholder="Search..."
              className="searchInput"
              onChange={event => {
                setSearchTerm(event.target.value);
              }}
            />
            <a href="#/" class="search-btn">
              <i class="fas fa-search"></i>
            </a>
          </div>
          <div class="row" style={{ marginLeft: '5px', marginRight: '5px' }}>
            <div class="col">
              {posts
                .filter(v => {
                  if (v.forum_user_sid !== 2 && searchTerm === '') {
                    return v;
                  } else if (
                    v.forum_user_sid !== 2 &&
                    v.art_title.includes(searchTerm)
                  ) {
                    return v;
                  }
                })
                .map(post => (
                  <Post post={post} />
                ))}
              {/* <nav aria-label="Page navigation example">
                <ul class="pagination forum-pagination">
                  <li class="page-item forum-page-item">
                    <a
                      style={{ color: '#808080' }}
                      class="page-link forum-page-link"
                      href="#/"
                    >
                      <i class="fas fa-angle-double-left"></i>
                      Previous
                    </a>
                  </li>
                  <li class="page-item forum-page-item">
                    <a
                      style={{ color: '#05F2F2' }}
                      class="page-link forum-page-link"
                      href="#/"
                    >
                      1
                    </a>
                  </li>
                  <li class="page-item forum-page-item">
                    <a class="page-link forum-page-link" href="#/">
                      2
                    </a>
                  </li>
                  <li class="page-item forum-page-item">
                    <a class="page-link forum-page-link" href="#/">
                      3
                    </a>
                  </li>
                  <li class="page-item forum-page-item">
                    <a
                      style={{ display: 'inline' }}
                      class="page-link forum-page-link"
                      href="#/"
                    >
                      Next
                    </a>
                    <i
                      style={{ fontSize: '10px' }}
                      class="fas fa-angle-double-right"
                    ></i>
                  </li>
                </ul>
              </nav> */}
            </div>
          </div>
        </div>
        {/* col-right */}
        <div class="forum-col-right">
          <div class="col">
            <div class="card-2">
              <ul class="list-group forum-list-group">
                <li class="list-group-item forum-list-group-item">
                  <p style={{ fontSize: '16px' }}>
                    {/* <i class="far fa-star"></i> */}
                    ???????????????
                  </p>
                  <ul>
                    <li>
                      <i class="fas fa-link forum_link"></i>
                      <Link
                        to="/forum-home/posts/31"
                        className="forum_link_item"
                      >
                        ??????????????????????????????????????????
                      </Link>
                    </li>
                    <li>
                      <i class="fas fa-link forum_link"></i>
                      <a href="#/" className="forum_link_item">
                        ??????????????? ??????u-apexion??????
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="list-group-item forum-list-group-item">
                  <p style={{ fontSize: '16px' }}>
                    {/* <i class="far fa-star"></i> */}
                    ????????????
                  </p>
                  <ul>
                    <li>
                      <i class="fas fa-link forum_link"></i>
                      <a href="#/" className="forum_link_item">
                        ????????????
                      </a>
                    </li>
                    <li>
                      <i class="fas fa-link forum_link"></i>
                      <a href="#/" className="forum_link_item">
                        ?????????????????????
                      </a>
                    </li>
                    <li>
                      <i class="fas fa-link forum_link"></i>
                      <a href="#/" className="forum_link_item">
                        ???????????????
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </AllDisplayFlex>
    </Root>
  );
}
