<h1> Path traversal attack & double encoding</h1>
<p> Path traversal attack is a technique in hexadecimal format, it has to do with security control.
For example, Path Traversal attacks use ../ (dot-dot-slash) while XSS attacks use < and > characters ,  ../ (dot-dot-slash) characters represent %2E%2E%2F in hexadecimal representation.
<br>
By using double encoding :-
we can merges hexadecimal encoding and encoding symbol % represents %25 ,then Double encoding of ../ represents %252E%252E%252F.
<hr>
For example:
<pre class="highlight">
<code>
<span class="nt">&lt;script&gt;</span>
<span class="nx">alert</span><span class="p">(<span><span class="dl">'</span><spanclass="s1">XSS</span><spanclass="dl">'</span><span class="p">)</span>
<span class="nt">&lt;/script&gt;</span>
</code>
</pre>

<table>
  <thead>
    <tr>
      <th>Char</th>
      <th>Hex encode</th>
      <th>Then encoding ‘%’</th>
      <th>Double encode</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code class="language-plaintext highlighter-rouge">&lt;</code></td>
      <td><code class="language-plaintext highlighter-rouge">%3C</code></td>
      <td><code class="language-plaintext highlighter-rouge">%25</code></td>
      <td><code class="language-plaintext highlighter-rouge">%253C</code></td>
    </tr>
    <tr>
      <td><code class="language-plaintext highlighter-rouge">/</code></td>
      <td><code class="language-plaintext highlighter-rouge">%2F</code></td>
      <td><code class="language-plaintext highlighter-rouge">%25</code></td>
      <td><code class="language-plaintext highlighter-rouge">%252F</code></td>
    </tr>
    <tr>
      <td><code class="language-plaintext highlighter-rouge">&gt;</code></td>
      <td><code class="language-plaintext highlighter-rouge">%3E</code></td>
      <td><code class="language-plaintext highlighter-rouge">%25</code></td>
      <td><code class="language-plaintext highlighter-rouge">%253E</code></td>
    </tr>
  </tbody>
</table>
<p>Finally, the malicious double encoding code is:</p>
<p><code class="language-plaintext highlighter-rouge">%253Cscript%253Ealert('XSS')%253C%252Fscript%253E</code></p>

Related Attacks:-<br>
SQL Injection<br>
Cross-site Scripting (XSS)<br>
Path Traversal
